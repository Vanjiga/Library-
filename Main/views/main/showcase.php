<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Custom jumbotron</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <button class="btn btn-primary btn-lg" type="button">Example button</button>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6 gy-5">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>
      
      <?php foreach($books as $book) : ?>
            <div class="col-md-6 gy-5">
                <div class="h-100 p-5 bg-white border rounded-3">
                <h2><?php echo $book['title'] ?></h2>
                <h5>Genre "<?php echo $book['category_name']?>"</h5>
                <h6>Written by <?php echo $book['author_name'] ?></h6>
                <h6>Added to Online <?php echo $book['added_date'] ?></h6>
                <p><?php echo $book['book_info'] ?></p>
  
                    <form method="post" action="" style="display: inline-block">
                    <input  type="hidden" name="book_id" value="<?php echo $book['book_id'] ?>"/>
                    <?php if (isset($_SESSION['username'])) { ?>
                     <button type="submit" class="btn btn-outline-success">Add to library</button>
                    <?php } ?>
                </form>
                </div>
            </div>
      <?php endforeach ?>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2021
    </footer>
  </div>
</main>