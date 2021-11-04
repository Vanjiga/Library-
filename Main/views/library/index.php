<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Hey <?php echo $user['username'] ?> welcome to your library</h1>
      <p class="lead my-3">Here you can have an overview of your recent books</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold"></a></p>
    </div>
  </div>

  <div class="row align-items-md-stretch">
      <div class="col-md-6 gy-5">
        <div class="h-100 p-5 text-white bg-danger rounded-3">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>
   
    <?php foreach($userbooks as $staffPick) : ?>
            <div class="col-md-6 gy-5">
                <div class="h-100 p-5 bg-white border rounded-3">
                <h2><?php echo $staffPick['title'] ?></h2>
                <h5>Genre "<?php echo $staffPick['category_name']?>"</h5>
                <h6>Written by <?php echo $staffPick['author_name'] ?></h6>
                <h6>Added to your library <?php echo $staffPick['user_added'] ?></h6>
                <h6>Book is due to <?php echo date('Y-m-d H:i:s', strtotime($staffPick['user_added']. ' + 10 days')); ?></h6>
                <p><?php echo $staffPick['book_info'] ?></p>
                <form method="post" action="" style="display: inline-block">
                <input  type="hidden" name="book_id" value="<?php echo $book['book_id'] ?>"/>
                <button type="submit" class="btn btn-outline-danger">Return this book</button>
                </div>
            </div>
      <?php endforeach ?>
  </div>
 