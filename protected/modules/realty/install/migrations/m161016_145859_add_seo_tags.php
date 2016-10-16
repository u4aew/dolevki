<?php

class m161016_145859_add_seo_tags extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->addColumn("apartments","seo_title","VARCHAR(100)");
        $this->addColumn("apartments","seo_description","VARCHAR(300)");
        $this->addColumn("apartments","seo_keywords","VARCHAR(300)");

        $this->addColumn("builders","seo_title","VARCHAR(100)");
        $this->addColumn("builders","seo_description","VARCHAR(300)");
        $this->addColumn("builders","seo_keywords","VARCHAR(300)");

        $this->addColumn("buildings","seo_title","VARCHAR(100)");
        $this->addColumn("buildings","seo_description","VARCHAR(300)");
        $this->addColumn("buildings","seo_keywords","VARCHAR(300)");

        $this->addColumn("districts","seo_title","VARCHAR(100)");
        $this->addColumn("districts","seo_description","VARCHAR(300)");
        $this->addColumn("districts","seo_keywords","VARCHAR(300)");
    }

	public function safeDown()
	{

	}
}