<?php
/**
 * Realty install migration
 * Класс миграций для модуля Realty:
 *
 * @category YupeMigration
 * @package  yupe.modules.realty.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_realty_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $sql = "
        CREATE TABLE `districts` (
    `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `icon` VARCHAR(255) NULL,
  `longitude` DECIMAL(14,8) NULL,
  `latitude` DECIMAL(14,8) NULL,
  `shortDescription` TEXT NULL,
  `longDescription` TEXT NULL,
  `isPublished` TINYINT(2) NULL,
  PRIMARY KEY (`id`));
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('districts');
    }
}
