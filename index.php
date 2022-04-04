<!--
  * @author Abobakr Aldubai
  * @author My Email <eng.bakraldubai@gmail.com>
  * Date of Edite : 4/4/2022
--> 

<?php 
    include_once 'header.html';
?>

<div class="container col-md-8">
  <h2>ERPNext API Call by php</h2>
<!-- API call form -->
  <form action="action.php"  method='post'>
    <div class="form-group">
      <label for="url">URL :</label>
      <input type="text" class="form-control" id="url" placeholder="Enter url" name="url" required>
    </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="https" id="https" > Use Https
        </label>
     
      </div>

      <div class="form-group">
        <label for="Access-key">Access Key :</label>
        <input type="text" class="form-control" id="access-key" placeholder="Enter Access Key" name="access-key" required>
      </div>

      <div class="form-group">
        <label for="Secret-key">Secret Key :</label>
        <input type="password" class="form-control" id="access-key" placeholder="Enter Secret Key" name="secret-key" required>
      </div>
      <div class="form-group">
        <label for="doctype">DOCTYPE :</label>
        <div class="col-md-4">
        <select class="form-control" name="doctype" size="0">
            <option value="Employee">
              Employee
            </option>
            <option value="User">
              User
            </option> 
<!--Note: Future work is geting Doctypes by API-->
        </select>
        </div> 
      </div>
    
      <button type="submit" name='get' class="btn btn-primary">GET</button>
      
    </form>
    
<!--Note: Future work is Making dynamic popup form that shows Doctype Fileds as Check list to by getten by the API and viewed in Table -->

<!--Note: Future work is providing the table with filters  -->
    </div>

<?php 
    include_once 'footer.html';
?>