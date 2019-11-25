<?php

class m170125_081218_add_column_phones_table extends CDbMigration
{
	public function up()
	{
	    $this->addColumn('phones','traffic','integer DEFAULT 0');
        $this->addColumn('phones','unlimited_apps','integer DEFAULT 0');
	}

	public function down()
	{
	    $this->dropColumn('phones','unlimited_apps');
        $this->dropColumn('phones','traffic');
		echo "m170125_081218_add_column_phones_table does not support migration down.\n";
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