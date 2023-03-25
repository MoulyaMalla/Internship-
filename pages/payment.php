<div class="container d-flex justify-content-start">
  <div >
    <div >
      <div >
          <h2>Payment process</h2>
      </div>
          <form name="f">

          <pre>
          Customer Name  :<input type="text" name="Customer Name" size="10"/><br>
          Contact        :<input type="text" name="Contact" size="10"/><br>
          Address        :<textarea name="text" value=" " rows="1" cols="12" scrolling="no"></textarea><br><br>
          Payment Type   :<select name="Mode of payment">
                            <option>Direct Bank Transfer</option>  
                            <option>Cheque Payment</option>  
                            <option>Pay pal</option> 
                            
                            </select>

          <input type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="Complete Order" name="submit" />   
          </pre>             
          </form>           
    </div>
  </div>
</div> <!--end shopping-cart -->
    
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog mt-5 p-5" role="document">
    <div class="modal-content p-5">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thank You for Shopping</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
        <h3>Visit us Again</h3>
        </center>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="reload()" class="btn btn-primary">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>
