           <!-- If customer show only the pages for customers -->
           <?php if($_SESSION["user_type"] == "Customer") : ?>
           <li class="nav-item ">
               <a class="nav-link" href="order.php">Order Donuts</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="myaccount.php">My Orders</a>
           </li>
           <!-- If the user is an admin show more pages -->
           <?php elseif($_SESSION["user_type"] == "Admin") : ?>
           <li class="nav-item ">
               <a class="nav-link" href="order.php">Order Donuts</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="all.php">Show all orders</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="search-date.php">Search Orders (By Date)</a>
           </li>
           <!-- Else show nothing -->

           <?php endif ?>