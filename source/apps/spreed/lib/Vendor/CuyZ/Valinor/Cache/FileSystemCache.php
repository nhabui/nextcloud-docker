<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Cache;

use OCA\Talk\Vendor\CuyZ\Valinor\Cache\Compiled\CompiledPhpFileCache;
use OCA\Talk\Vendor\CuyZ\Valinor\Cache\Compiled\MixedValueCacheCompiler;
use OCA\Talk\Vendor\CuyZ\Valinor\Definition\ClassDefinition;
use OCA\Talk\Vendor\CuyZ\Valinor\Definition\FunctionDefinition;
use OCA\Talk\Vendor\CuyZ\Valinor\Definition\Repository\Cache\Compiler\ClassDefinitionCompiler;
use OCA\Talk\Vendor\CuyZ\Valinor\Definition\Repository\Cache\Compiler\FunctionDefinitionCompiler;
use OCA\Talk\Vendor\Psr\SimpleCache\CacheInterface;
use Traversable;

use function is_object;
use function sys_get_temp_dir;

/**
 * @api
 *
 * @template EntryType
 * @implements WarmupCache<EntryType>
 */
final class FileSystemCache implements WarmupCache
{
    /** @var array<string, CacheInterface<EntryType>> */
    private array $delegates;

    public function __construct(string $cacheDir = null)
    {
        $cacheDir ??= sys_get_temp_dir();

        // @infection-ignore-all
        $this->delegates = [
            '*' => new CompiledPhpFileCache($cacheDir . DIRECTORY_SEPARATOR . 'mixed', new MixedValueCacheCompiler()),
            ClassDefinition::class => new CompiledPhpFileCache($cacheDir . DIRECTORY_SEPARATOR . 'classes', new ClassDefinitionCompiler()),
            FunctionDefinition::class => new CompiledPhpFileCache($cacheDir . DIRECTORY_SEPARATOR . 'functions', new FunctionDefinitionCompiler()),
        ];
    }

    public function warmup(): void
    {
        foreach ($this->delegates as $delegate) {
            if ($delegate instanceof WarmupCache) {
                $delegate->warmup();
            }
        }
    }

    public function has($key): bool
    {
        foreach ($this->delegates as $delegate) {
            if ($delegate->has($key)) {
                return true;
            }
        }

        return false;
    }

    public function get($key, $default = null): mixed
    {
        foreach ($this->delegates as $delegate) {
            if ($delegate->has($key)) {
                return $delegate->get($key, $default);
            }
        }

        return $default;
    }

    public function set($key, $value, $ttl = null): bool
    {
        $delegate = $this->delegates['*'];

        if (is_object($value) && isset($this->delegates[$value::class])) {
            $delegate = $this->delegates[$value::class];
        }

        return $delegate->set($key, $value, $ttl);
    }

    public function delete($key): bool
    {
        $deleted = true;

        foreach ($this->delegates as $delegate) {
            $deleted = $delegate->delete($key) && $deleted;
        }

        return $deleted;
    }

    public function clear(): bool
    {
        $cleared = true;

        foreach ($this->delegates as $delegate) {
            $cleared = $delegate->clear() && $cleared;
        }

        return $cleared;
    }

    /**
     * @return Traversable<string, EntryType|null>
     */
    public function getMultiple($keys, $default = null): Traversable
    {
        foreach ($keys as $key) {
            yield $key => $this->get($key, $default);
        }
    }

    public function setMultiple($values, $ttl = null): bool
    {
        $set = true;

        foreach ($values as $key => $value) {
            $set = $this->set($key, $value, $ttl) && $set;
        }

        return $set;
    }

    public function deleteMultiple($keys): bool
    {
        $deleted = true;

        foreach ($keys as $key) {
            $deleted = $this->delete($key) && $deleted;
        }

        return $deleted;
    }
}
