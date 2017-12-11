<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact_me`.
 */
class m171205_092761_create_contact_me_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        if ($this->db->schema->getTableSchema('{{%contact_me}}', true) === null) {
            $this->createTable('{{%contact_me}}', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'phone' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%contact_me}}');
    }
}
