<?php

use yii\db\Migration;

class m170611_195428_bk_year_type extends Migration
{
    public function up()
    {
        $this->alterColumn('tbl_book','bk_pb_year',"VARCHAR(20)");
    }

    public function down()
    {
        echo "m170611_195428_bk_year_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
