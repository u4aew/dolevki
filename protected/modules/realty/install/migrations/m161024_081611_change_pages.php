<?php

class m161024_081611_change_pages extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->dropTable("realtyPages");
        $this->createTable("realtyPages", [
            'id' => 'pk',
            'seo_title' => 'string',
            'seo_description' => 'text',
            'seo_keywords' => 'text',
            'h1' => 'string',
            'type' => 'int',
            'upper_text' => 'text',
            'down_text' => 'text',
        ]);
	}

	public function safeDown()
	{

	}
}