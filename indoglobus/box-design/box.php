<style>
.myDiv {
  border:2px solid #0094ff;

  width:300px;
  font-size:12pt; /* or whatever */
}
.myDiv div:nth-child(1) {
  padding:4px;
  color:#fff;
  margin:0;
  background-color:#0094ff;
  height:30px;

}
.myDiv div:nth-child(1) h2 {
  padding:4px;
  color:#f00;
  margin:0;
  background-color:#0094ff;
  width:45%;
  font-size:12pt; /* or whatever */
}
.myDiv div:nth-child(1) h2:nth-child(1) {
  float:left;
}
.myDiv div:nth-child(1) h2:nth-child(2) {
  float:right; text-align:right;
}
.myDiv p {
  padding:4px; 
}
</style>
<div class="myDiv">
  <div><h2>Div Title</h2><h2>Div Title</h2></div>
  <p><center>Div content.</center></p>
</div>