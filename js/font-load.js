(function(){
      // if firefox 3.5+, hide content till load (or 3 seconds) to prevent FOUT
      var d = document, e = d.documentElement, s = d.createElement('style');
      if (e.style.MozTransform === ''){ // gecko 1.9.1 inference
        s.textContent = 'body{visibility:hidden}';
        var r = document.getElementsByTagName('script')[0];
        r.parentNode.insertBefore(s, r);
        function f(){ 
          s.parentNode && s.parentNode.removeChild(s); }
          addEventListener('load',f,false);
          setTimeout(f,5000);
        }
      })();
    // a nice improvement to this script is to only hide the elements using webfonts 
    // with visibility:hidden instead of the entire <body>
    // that's up to you to select them in that textContent line, though