<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCasbinRule extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // 权限
        $rule = $this->table('rule', ['signed' => false]);
        $rule->addColumn('ptype', 'string', ['limit' => 8, 'comment' => '规则类型'])
            ->addColumn('v0', 'string', ['default' => ''])
            ->addColumn('v1', 'string', ['default' => ''])
            ->addColumn('v2', 'string', ['default' => ''])
            ->addColumn('v3', 'string', ['default' => ''])
            ->addColumn('v4', 'string', ['default' => ''])
            ->addColumn('v5', 'string', ['default' => ''])
            ->addIndex(['ptype'],['name'=>'idx_ptype'])
            ->addIndex(['v0'],['name'=>'idx_v0'])
            ->addIndex(['v1'],['name'=>'idx_v1'])
            ->addIndex(['v2'],['name'=>'idx_v2'])
            ->addIndex(['v3'],['name'=>'idx_v3'])
            ->addIndex(['v4'],['name'=>'idx_v4'])
            ->addIndex(['v5'],['name'=>'idx_v5'])
            ->create();
    }
}
