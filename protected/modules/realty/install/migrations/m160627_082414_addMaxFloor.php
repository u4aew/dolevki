<?php

class m160627_082414_addMaxFloor extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        ALTER TABLE `apartments` ADD `maxFloor` INTEGER(11)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();
    }

	public function safeDown()
	{

	}
}