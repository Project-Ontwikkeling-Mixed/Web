var map = new GMaps({
  el: '.map-box',
  lat: 51.2154075,
  lng: 4.409795,
  zoom: 12
});

new Vue({
  el: '#home-page',


  data: function(){
    return{
      mediaItem: 0,
      mediaItems: document.getElementsByClassName('media-item'),
      questionAnswers: "",
      currentQuestion: 0
    }
  },

  ready: function(){
    var value = {
      id: 1
    };

    this.fetchProjectData(this, value);
    this.fetchProjects();
    this.fetchMedia();
    this.setMediaItem();
  },

  methods: {

    setMediaItem: function(){
      for(var item = 0; item < this.mediaItems.length; item++){
        this.mediaItems[item].style.display = "none";
      }
      var toView = document.getElementById("media-" + this.mediaItem.toString());
      toView.style.display = "block";
    },

    answerQuestion: function(id){
      console.log(id);
      this.$http.get('/antwoord/' + id, function(){
        this.currentQuestion++;
      });
    },

    next: function(){
      this.mediaItem++;
      if(this.mediaItem > this.mediaItems.length - 1){
        this.mediaItem = this.mediaItems.length - 1;
      }
      this.setMediaItem();
    },

    previous: function(){
      this.mediaItem--;
      if(this.mediaItem < this.mediaItems.length - 1){
        this.mediaItem = 0;
      }
      this.setMediaItem();
    },

    fetchMedia: function(){
      this.$http.get('/json/media/all', function(media){
        this.$set('media', media);
        this.setMediaItem();
      });
    },

    fetchProjectData: function(scope, value){
      scope.$http.get('/json/project/' + value.id, function(project){
        scope.$set('project', project);

        scope.$http.get('/json/fases/active/' + value.id, function(fase){
          if(fase[0] == null){
            scope.$set('activeFase', {naam: "Geen fase actief"})
          }else{
            scope.$set('activeFase', fase[0]);
          }
        });

        scope.$http.get('/json/inspraakvragen/' + value.id, function(questions){
          scope.$set('questions', questions);
        });
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
            title: 'Klik hier om het project ' + value.naam + 'te bekijken.',
            infoWindow: {
              content : value.naam
            },
            click: function(e){
              thisThing.fetchProjectData(thisThing, value);
            }
          });
        });
      });
    }
  }
});
