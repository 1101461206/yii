<?php

use yii\db\Migration;

/**
 * Class m190821_023749_init
 */
class m190821_023749_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190821_023749_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_023749_init cannot be reverted.\n";

        return false;
    }
    */
}