<?php

namespace Friendface\Models;

use Illuminate\Database\Eloquent\Model;


class Status extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'statuses';
        
    protected $fillable = [
        'body'
    ];
    
    
    public function user() {
        
        return $this->belongsTo('Friendface\Models\User', 'user_id');
        
    }
    
    
    public function scopeNotReply($query) {
        
        return $query->whereNull('parent_id');
        
    }
    
    public function replies() {
        
        return $this->hasMany('Friendface\Models\Status', 'parent_id');
        
    }
    
    public function likes() {
        
        return $this->morphMany('Friendface\Models\Like', 'likeable');
        
    }
}

