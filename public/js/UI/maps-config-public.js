var map = new GMaps({
  el: '.map-box',
  lat: 51.2154075,
  lng: 4.409795,
  zoom: 12
});

new Vue({
  el: '#home-page',

  ready: function(){
    this.fetchAProject();
    this.fetchProjects();
    this.fetchMedia();
  },

  methods: {

    fetchAProject: function(){
      var that = this;
      this.$http.get('/json/project/1', function(project){
        that.$set('project', project);
        console.log(project.project);
      });
    },

    fetchMedia: function(){
      this.$http.get('/json/media/all', function(media){
        this.$set('media', media);
      });
    },

    fetchProjects: function(){
      var thisThing = this;
      this.$http.get('/json/project/all', function(projects){

        $.each(projects,function(index,value){

          var location = value.locatie.split(",");

          map.addMarker({
            lat: location[0],
            lng: location[1],
            title: value.naam,
            infoWindow: {
              content : value.naam
            },
            click: function(e){
              //console.log(thisThing);
              thisThing.$http.get('/json/project/' + value.id, function(project){
                thisThing.$set('project', project);
                console.log(project.project);
              });
            }
          });
        });
      });
    }
  }
});
