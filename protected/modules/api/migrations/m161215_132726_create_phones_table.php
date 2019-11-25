<?php

class m161215_132726_create_phones_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('phones', array(
            'id' => 'pk',
            'id_region' => 'integer',
            'name' => 'string NOT NULL',
            'price'=> 'float',
            'package_volume'=>'integer',
            'launch_date'=>'datetime',
            'close_date'=>'datetime',
            'sms'=> 'integer',
            'sms_active'=> 'boolean',
            'active'=> 'boolean DEFAULT 1',
        ));
        $this->createIndex('id_region', 'phones', 'id_region');
        $this->addForeignKey('fk-phones-id_region', 'phones', 'id_region', 'regions', 'id','CASCADE','CASCADE');
    }

	public function down()
	{
        $this->dropTable('phones');
        echo "m161215_132726_create_phones_table does not support migration down.\n";
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