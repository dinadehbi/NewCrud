fetch('edite.php').then(response=>response.text())
   .then(data=>{
    document.getElementById('data').innerHTML = data
   })
   .catch(error=>{
    console.error(error);
    console.log('something went wrong');
   })
