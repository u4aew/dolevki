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
class m000000_000001_realty_buildings extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $sql = "
        CREATE TABLE `buildings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(200) NULL,
  `adres` VARCHAR(200) NULL,
  `longitude` DECIMAL(14,8) NULL,
  `latitude` DECIMAL(14,8) NULL,
  `idDistrict` INT NULL,
  `idBuilder` INT NULL,
  `isPublished` TINYINT(2) NULL,
  `isShowedOnMap` TINYINT(2) NULL,
  `shortDescription` TEXT NULL,
  `longDescription` TEXT NULL,
  `status` INT NULL,
  `readyTime` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `apartments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idBuilding` INT NULL,
  `floor` INT NULL,
  `rooms` INT NULL,
  `size` INT NULL,
  `cost` INT NULL,
  `shortDescription` TEXT NULL,
  `longDescription` TEXT NULL,
  PRIMARY KEY (`id`));
CREATE TABLE `images` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idRecord` INT NULL,
  `idTable` INT NULL,
  `path` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `builders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `shortDescription` TEXT NULL,
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
        $this->dropTableWithForeignKeys('buildings');
        $this->dropTableWithForeignKeys('apartments');
    }
}
