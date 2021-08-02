function search(){
    var keyword = document.getElementById("searchtxt").value;
    if (keyword!="") {
      var link = 'search.php?src='+keyword;
      window.location.replace('search.php');
    }else{
      alert('Please enter some text to search');
    }
  }