var map = new GMaps({
        el: '.map-box',
        lat: 51.2154075,
        lng: 4.409795,
        zoom: 12
    });
new Vue({
  el: '#home-page',

  ready: function(){
    this.fetchProjects();
  },

  methods: {
    fetchProjects: function(){
        var thisThing = this;
      this.$http.get('/json/project/all', function(projects){

          $.each(projects,function(index,value){

             var location = value.locatie.split(",");

              map.addMarker({
                  lat: location[0],
                  lng: location[1],
                  title: 'Marker #',
                  infoWindow: {
                    content : value.naam
                    },
                  click: function(e){
                      //console.log(thisThing);
                      thisThing.$http.get('/json/project/' + value.id, function(project){
                            thisThing.$set('project', project);
                            console.log(project.project);
                        })
                  }
                })
          })
      });
    }


  }
});
