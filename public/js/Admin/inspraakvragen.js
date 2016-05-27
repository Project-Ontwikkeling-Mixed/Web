new Vue({
  el: '#questionSection',

  data: function(){
    return{
      nieuw: true,
      selectedQuestion: 'new'
    };
  },

  ready: function(){
    var id = $('#questionSection').attr('data-id');
    
    //zet de id eventjes op nieuw zodat het een create formulier is
    this.$set('selectedQuestion', {id: 'new'});
    this.fetchQuestions(id);

  },

  methods: {
    fetchQuestions: function(id){
      this.$http.get('/json/inspraakvraag/all/'+ id, function(questions){
        this.$set('questions', questions);
        this.$set('test','eureka');
        console.log(questions[0].vraag);
      });
    }

    /*tabFase: function(event){
      faseId = event.target.id;

      this.$http.get('/json/fases/' + faseId, function(currentFase){
        this.$set('selectedFase', currentFase[0]);
        this.nieuw = false;
      });
    },

    nieuwProject: function(){
      this.$set('selectedFase', {id:'new'});
    }*/
  }
});
