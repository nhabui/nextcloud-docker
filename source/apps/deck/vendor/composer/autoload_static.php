<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit100910e14ce26e45293a1b29bc723416
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JsonSchema\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JsonSchema\\' => 
        array (
            0 => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'JsonSchema\\Constraints\\BaseConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/BaseConstraint.php',
        'JsonSchema\\Constraints\\CollectionConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/CollectionConstraint.php',
        'JsonSchema\\Constraints\\Constraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/Constraint.php',
        'JsonSchema\\Constraints\\ConstraintInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/ConstraintInterface.php',
        'JsonSchema\\Constraints\\EnumConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/EnumConstraint.php',
        'JsonSchema\\Constraints\\Factory' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/Factory.php',
        'JsonSchema\\Constraints\\FormatConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/FormatConstraint.php',
        'JsonSchema\\Constraints\\NumberConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/NumberConstraint.php',
        'JsonSchema\\Constraints\\ObjectConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/ObjectConstraint.php',
        'JsonSchema\\Constraints\\SchemaConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/SchemaConstraint.php',
        'JsonSchema\\Constraints\\StringConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/StringConstraint.php',
        'JsonSchema\\Constraints\\TypeCheck\\LooseTypeCheck' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/TypeCheck/LooseTypeCheck.php',
        'JsonSchema\\Constraints\\TypeCheck\\StrictTypeCheck' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/TypeCheck/StrictTypeCheck.php',
        'JsonSchema\\Constraints\\TypeCheck\\TypeCheckInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/TypeCheck/TypeCheckInterface.php',
        'JsonSchema\\Constraints\\TypeConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/TypeConstraint.php',
        'JsonSchema\\Constraints\\UndefinedConstraint' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Constraints/UndefinedConstraint.php',
        'JsonSchema\\Entity\\JsonPointer' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Entity/JsonPointer.php',
        'JsonSchema\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/ExceptionInterface.php',
        'JsonSchema\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/InvalidArgumentException.php',
        'JsonSchema\\Exception\\InvalidConfigException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/InvalidConfigException.php',
        'JsonSchema\\Exception\\InvalidSchemaException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/InvalidSchemaException.php',
        'JsonSchema\\Exception\\InvalidSchemaMediaTypeException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/InvalidSchemaMediaTypeException.php',
        'JsonSchema\\Exception\\InvalidSourceUriException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/InvalidSourceUriException.php',
        'JsonSchema\\Exception\\JsonDecodingException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/JsonDecodingException.php',
        'JsonSchema\\Exception\\ResourceNotFoundException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/ResourceNotFoundException.php',
        'JsonSchema\\Exception\\RuntimeException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/RuntimeException.php',
        'JsonSchema\\Exception\\UnresolvableJsonPointerException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/UnresolvableJsonPointerException.php',
        'JsonSchema\\Exception\\UriResolverException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/UriResolverException.php',
        'JsonSchema\\Exception\\ValidationException' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Exception/ValidationException.php',
        'JsonSchema\\Iterator\\ObjectIterator' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Iterator/ObjectIterator.php',
        'JsonSchema\\Rfc3339' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Rfc3339.php',
        'JsonSchema\\SchemaStorage' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/SchemaStorage.php',
        'JsonSchema\\SchemaStorageInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/SchemaStorageInterface.php',
        'JsonSchema\\UriResolverInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/UriResolverInterface.php',
        'JsonSchema\\UriRetrieverInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/UriRetrieverInterface.php',
        'JsonSchema\\Uri\\Retrievers\\AbstractRetriever' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/Retrievers/AbstractRetriever.php',
        'JsonSchema\\Uri\\Retrievers\\Curl' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/Retrievers/Curl.php',
        'JsonSchema\\Uri\\Retrievers\\FileGetContents' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/Retrievers/FileGetContents.php',
        'JsonSchema\\Uri\\Retrievers\\PredefinedArray' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/Retrievers/PredefinedArray.php',
        'JsonSchema\\Uri\\Retrievers\\UriRetrieverInterface' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/Retrievers/UriRetrieverInterface.php',
        'JsonSchema\\Uri\\UriResolver' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/UriResolver.php',
        'JsonSchema\\Uri\\UriRetriever' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Uri/UriRetriever.php',
        'JsonSchema\\Validator' => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema/Validator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit100910e14ce26e45293a1b29bc723416::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit100910e14ce26e45293a1b29bc723416::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit100910e14ce26e45293a1b29bc723416::$classMap;

        }, null, ClassLoader::class);
    }
}