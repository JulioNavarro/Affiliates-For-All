<?php /*

Copyright (c) 2008 Metathinking Ltd.

This file is part of Affiliates For All.

Affiliates For All is free software: you can redistribute it and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

Affiliates For All is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with Affiliates For All.  If not, see
<http://www.gnu.org/licenses/>.

*/

require_once 'dummycart.inc'

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN";
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Test Shopping Cart</title>
  <script type="text/javascript">
    <!--
    function neworder() {
      var orderno = new Date().getTime();
      document.getElementById("orderno").setAttribute("value", orderno);
    }
    -->
  </script>
</head>
<body>
  <h1>Place Your Order</h1>

  <form action="buy.php" onsubmit="neworder()">
    <p>Customer email: <input type="text" name="email"/></p>
    <p>Customer name: <input type="text" name="name"/></p>
    <p>Customer ID: <input type="text" name="customer"/></p>
    <p>Widgets required at $5 each:
      <input id="orderno" type="hidden" name="orderno" value=""/>
      <input type="text" name="quantity" size="3" value="1"/>
      <input type="submit" value="Buy Now"/>
    </p>
  </form>

</body>
</html>
