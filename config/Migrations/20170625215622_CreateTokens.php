<?php
use Migrations\AbstractMigration;

class CreateTokens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tokens');
        $table -> addColumn ('created', 'datetime');
        $table -> addColumn ('tokenNum', 'string', [
            'default' => null,
            'limit' => 64,
            'null' => false
        ]);
        $table->create();
    }
}
