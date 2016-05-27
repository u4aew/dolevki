<?php

class m160527_064838_addReadyTimes extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        CREATE TABLE `readyTimes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(200) NULL,
  `zindex` INT NULL,
  PRIMARY KEY (`id`));
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();


    }

	public function safeDown()
	{

	}
}