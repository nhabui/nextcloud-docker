<?php
/**
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\SideMenu\Settings;

use OCA\SideMenu\AppInfo\Application;
use OCA\SideMenu\Service\ConfigProxy;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\Settings\IIconSection;

class PersonalSection implements IIconSection
{
    public function __construct(
        protected IURLGenerator $url,
        protected IL10N $l,
        protected ConfigProxy $configProxy
    ) {
    }

    public function getID()
    {
        if ($this->configProxy->getAppValueBool('force', '0')) {
            return '';
        }

        return Application::APP_ID;
    }

    public function getName()
    {
        if ($this->configProxy->getAppValueBool('force', '0')) {
            return '';
        }

        return $this->l->t(Application::APP_NAME);
    }

    public function getPriority()
    {
        if ($this->configProxy->getAppValueBool('force', '0')) {
            return null;
        }

        return 70;
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        return $this->url->imagePath(Application::APP_ID, 'icon.svg');
    }
}
