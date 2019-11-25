<?php

class m170113_125114_create_links_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('links', array(
            'id' => 'pk',
            'hash' => 'varchar(33) NOT NULL',
            'url' => 'string NOT NULL',
            'settings' => 'text',
            'link' => 'string NOT NULL',
        ));

        $this->createIndex('hash', 'links', 'hash');
        $this->createIndex('link', 'links', 'link', true);
    }

	public function down()
	{
        $this->dropTable('links');
        echo "m170113_125114_create_link_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}