<?php

class m160531_143622_addSlugsToModels extends yupe\components\DbMigration
{
	public function safeUp()
	{

        $sql = "
        ALTER TABLE `builders` ADD `slug` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();

        $sql = "
        ALTER TABLE `districts` ADD `slug` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();
	}

	public function safeDown()
	{

	}
}