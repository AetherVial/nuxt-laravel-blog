<?php

namespace App\Traits;
//creates a trait by which to order whatever
trait Orderable{
  public function scopeLatestFirst($query) {
    return $query->orderBy('created_at', 'desc');
  }

  public function scopeOldestFirst($query) {
    return $query->orderBy('created_at', 'asc');
  }
}