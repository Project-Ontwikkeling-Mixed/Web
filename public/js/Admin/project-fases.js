new Vue({
  el: '#project-page',

  data: function(){
    return{
      nieuw: true,
      selectedFase: 'new',
      id: 0,
        nieuweVraag: false,
        extraAntwoordTeller: 1
    };
  },

  ready: function(){
    var id = document.getElementById('project-page').getAttribute('data-id');

    //zet de id eventjes op nieuw zodat het een create formulier is
    var active_fase = this.getFaseCookie();

    if(active_fase){
      this.$set('selectedFase', {id: active_fase});
      this.sessionChooseFase(active_fase);
    }else{
      this.$set('selectedFase', {id: 'new'});
    }

    this.fetchProject(id);

    //activeer datetimepicker voor begindatum
    $('#begin').datetimepicker({
      format: 'YYYY-MM-DD hh:mm:ss'
    });

    //activeer datetimepicker voor einddatum
    $('#einde').datetimepicker({
      format: 'YYYY-MM-DD hh:mm:ss'
    });
  },

  methods: {
    getFaseCookie: function(){
      var cookies = document.cookie.split(';');

      for(var cookie = 0; cookie < cookies.length; cookie++){
        var this_cookie = cookies[cookie].split("=");

        var cookie_key = this_cookie[0];
        var cookie_value = this_cookie[1];

        if(cookie_key.trim() == "fase_id"){
          document.cookie = 'fase_id' + '=; expires=' + Date.now().toString() + '; path=/';
          return cookie_value;
        }
      }

      return false;
    },



    fetchProject: function(id){
      this.$http.get('/json/project/' + id, function(project){
        this.$set('project', project);
      });
    },

    tabFase: function(event){
      faseId = event.target.id;

      this.$http.get('/json/fases/' + faseId, function(currentFase){
        this.$set('selectedFase', currentFase[0]);
        this.nieuw = false;

        this.$http.get('/json/inspraakvragen/' + faseId, function(questions){
          this.$set('questions', questions);
        });
      });
    },

    chooseAnswer: function(id){
      this.$set('id', id);
    },

    sessionChooseFase: function(faseId){
      this.$http.get('/json/fases/' + faseId, function(currentFase){
        this.$set('selectedFase', currentFase[0]);
        this.nieuw = false;
      });
    },

    nieuwProject: function(){
      this.$set('selectedFase', {id:'new'});
    },
    openQuestionSection: function(){
        this.nieuweVraag = true;
    },
      closeQuestionSection: function(){
        this.nieuweVraag = false;
    },
    extraAntwoordToevoegen: function(){
        this.extraAntwoordTeller++;
    },
    extraAntwoordVerwijderen: function(){
        if(this.extraAntwoordTeller!=1){
            this.extraAntwoordTeller--;
        }
    }
  }
});
