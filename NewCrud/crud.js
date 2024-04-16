function getData(word=''){
    let wordSearch = {
      wordS : word
    };
      fetch('crud.php',{
              method:'POST',
              headers:{
                'Content-Type':'application/json'
              },
              body:JSON.stringify(wordSearch)
           }).then(response=>response.text())
             .then(data=>{
              document.getElementById('data').innerHTML = data
             })
             .catch(error=>{
              console.error(error);
              console.log('something went wrong');
             })
  }
  getData();
