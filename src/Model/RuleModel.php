<?php

declare(strict_types=1);

namespace Qifen\Casbin\Model;

use support\Model;

/**
 * RuleModel Model
 */
class RuleModel extends Model 
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rule';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
