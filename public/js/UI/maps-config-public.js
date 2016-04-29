

new Vue({
  el: '.map-box',

  ready: function(){
    var map = new GMaps({
        el: '.map-box',
        lat: 51.2154075,
        lng: 4.409795,
        zoom: 12
    });
      
    this.fetchProjects();
  },

  methods: {
    fetchProjects: function(){
      this.$http.get('/json/project/all', function(projects){
          
          
          $.each(projects,function(index,value){
              
              
             var location = value.locatie.split(",");
              
              console.log(location);
              
              map.addMarker({
                  lat: location[0],
                  lng: location[1],
                  title: 'Marker #',
                  infoWindow: {
                    content : value.naam
                    },
                  click: function(e){
                      alert
                  }
                })
              
              
          })
              
 
          
          
          
          
      });
    }
  }
});
