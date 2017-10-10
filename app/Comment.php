<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
  //restricts columns from modifying
  protected $guarded = [];
  
  //get related task
  public function task(){
    return $this->belongsTo('App\Task','task_id');
  }
}