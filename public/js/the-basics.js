var substringMatcher = function(strs) {
    console.log('strs', strs);
    return function findMatches(q, cb) {
      console.log('q', q);
      var matches, substringRegex;
  
      // an array that will be populated with substring matches
      matches = [];
      console.log('matches', matches);
  
      // regex used to determine if a string contains the substring `q`
      substrRegex = new RegExp(q, 'i');
  
      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      $.each(strs, function(i, str) {
        if (substrRegex.test(str)) {
          matches.push(str);
        }
      });
      
      console.log('matches', matches);
  
      cb(matches);
    };
  };
  var datas = []
  $.getJSON('/autocomplete-search', function(data){
    $.each(data, function(index) {
        datas.push(data[index].nama_obat)
      })
      console.log(datas)
      $('#the-basics').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'datas',
        source: substringMatcher(datas)
      });
    })
  // var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
  //   'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
  //   'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
  //   'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
  //   'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
  //   'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
  //   'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
  //   'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
  //   'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
  // ];
  
  