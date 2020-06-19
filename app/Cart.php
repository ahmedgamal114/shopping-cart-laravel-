<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Cart
{
    //
    public $items=null;
    public $totalQty=0;
    public $totalprice=0;


    public function __construct($oldcart)
    {
   if($oldcart)
{
$this->items=$oldcart->items;
$this->totalQty =$oldcart->totalQty;
$this->totalprice=$oldcart->totalprice;}}

  public function add($item ,$id){
  $storeditem =[
        'Qty'=>0,
        'price'=>$item->price,
        'item'=>$item,
      ];
  if($this->items){
if(array_key_exists($id,$this->items))
{
$storeditem=$this->items[$id];
}
      }
$storeditem['Qty']++;
$storeditem['price']=$item->price * $storeditem['Qty'];
      $this->items[$id]=$storeditem;
      $this->totalQty++;
      $this->totalprice+=$item->price;

    }

public function reduceByOne($id){

  $this->items[$id]['Qty']--;
  $this->items[$id]['price']-=$this->items[$id]['price'];
  $this->totalQty--;
  $this->totalprice-=$this->items[$id]['price'];

if($this->items[$id]['Qty'] <= 0 ){
  unset($this->items[$id]);
} }


public function removeItem($id){

  $this->totalQty-= $this->items[$id]['Qty'];
  $this->totalprice-=$this->items[$id]['price'];
    unset($this->items[$id]);

}
























}
