<?php

class m160706_143104_addLinksToBuilders extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $sql = "
        ALTER TABLE `builders` ADD `link` VARCHAR(250)
        ";
        $command = $this->dbConnection->createCommand($sql);
        $command->execute();

    }

	public function safeDown()
	{

	}
}