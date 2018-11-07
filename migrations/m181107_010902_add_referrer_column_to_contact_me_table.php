<?php

use yii\db\Migration;

/**
 * Handles adding referrer to table `contact_me`.
 */
class m181107_010902_add_referrer_column_to_contact_me_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%contact_me}}', 'referrer', $this->text()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%contact_me}}', 'referrer');
    }
}
