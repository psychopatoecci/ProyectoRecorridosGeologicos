<?php
use Migrations\AbstractMigration;

class CreateComponents extends AbstractMigration
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
        $table = $this->table('components', [id => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('informacion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
