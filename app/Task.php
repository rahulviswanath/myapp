<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
  //restricts columns from modifying
  protected $guarded = [];
  
  // returns all comments on that task
  public function comments(){
    return $this->hasMany('App\Comment','task_id');
  }
  
}