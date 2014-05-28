/*
 *
 *  jQuery PlaceholderText by Gary Hepting
 *
 *  Open source under the MIT License.
 *
 *  Copyright © 2013 Gary Hepting. All rights reserved.
 *
*/


(function() {
  (function($) {
    return $.fn.placeholderText = function(options) {
      var createPlaceholderContent, opts, placeholder;
      $.fn.placeholderText.defaults = {
        type: "paragraphs",
        amount: "1",
        html: true,
        punctuation: true
      };
      opts = $.extend({}, $.fn.placeholderText.defaults, options);
      placeholder = new Array(10);
      placeholder[0] = "Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.";
      placeholder[1] = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Aliquam erat volutpat. Nunc auctor. Mauris pretium quam et urna. Fusce nibh. Duis risus. Curabitur sagittis hendrerit ante. Aliquam erat volutpat. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis condimentum augue id magna semper rutrum. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. Fusce consectetuer risus a nunc. Aliquam ornare wisi eu metus. Integer pellentesque quam vel velit. Duis pulvinar.";
      placeholder[2] = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi gravida libero nec velit. Morbi scelerisque luctus velit. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Proin mattis lacinia justo. Vestibulum facilisis auctor urna. Aliquam in lorem sit amet leo accumsan lacinia. Integer rutrum, orci vestibulum ullamcorper ultricies, lacus quam ultricies odio, vitae placerat pede sem sit amet enim. Phasellus et lorem id felis nonummy placerat. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Aenean vel massa quis mauris vehicula lacinia. Quisque tincidunt scelerisque libero. Maecenas libero. Etiam dictum tincidunt diam. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Suspendisse nisl. Sed convallis magna eu sem. Cras pede libero, dapibus nec, pretium sit amet, tempor quis, urna.";
      placeholder[3] = "Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium lectus id turpis. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Fusce wisi. Phasellus faucibus molestie nisl. Fusce eget urna. Curabitur vitae diam non enim vestibulum interdum. Nulla quis diam. Ut tempus purus at lorem.";
      placeholder[4] = "In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam id dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris dictum facilisis augue. Fusce tellus. Pellentesque arcu. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu, urna. Nullam at arcu a est sollicitudin euismod. Praesent dapibus. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Nam sed tellus id magna elementum tincidunt.";
      placeholder[5] = "Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat.";
      placeholder[6] = "Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci.";
      placeholder[7] = "Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo.";
      placeholder[8] = "Maecenas ipsum velit, consectetuer eu, lobortis ut, dictum at, dui. In rutrum. Sed ac dolor sit amet purus malesuada congue. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Suspendisse sagittis ultrices augue. Mauris metus. Nunc dapibus tortor vel mi dapibus sollicitudin. Etiam posuere lacus quis dolor. Praesent id justo in neque elementum ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. In convallis. Fusce suscipit libero eget elit. Praesent vitae arcu tempor neque lacinia pretium. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus.";
      placeholder[9] = "Aenean placerat. In vulputate urna eu arcu. Aliquam erat volutpat. Suspendisse potenti. Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna gravida vehicula. Mauris tincidunt sem sed arcu. Nunc posuere. Nullam lectus justo, vulputate eget, mollis sed, tempor sed, magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam neque. Curabitur ligula sapien, pulvinar a, vestibulum quis, facilisis vel, sapien. Nullam eget nisl. Donec vitae arcu.";
      createPlaceholderContent = function(el) {
        var count, i, iParagraphCount, iWordCount, list, numOfChars, numOfWords, outputString, placeholderText, random, tempString, wordList;
        options = {};
        if ($(el).data('placeholderType') !== 'undefined') {
          options.type = $(el).data('placeholderType');
        }
        if ($(el).data('placeholderAmount') !== 'undefined') {
          options.amount = $(el).data('placeholderAmount');
        }
        if ($(el).data('placeholderHtml') !== 'undefined') {
          options.html = $(el).data('placeholderHtml');
        }
        if ($(el).data('placeholderPunctuation') !== 'undefined') {
          options.punctuation = $(el).data('placeholderPunctuation');
        }
        opts = $.extend({}, $.fn.placeholderText.defaults, options);
        count = opts.amount;
        placeholderText = "";
        i = 0;
        while (i < count) {
          random = Math.floor(Math.random() * 10);
          if (opts.html) {
            placeholderText += "<p>";
          }
          placeholderText += placeholder[random];
          if (opts.html) {
            placeholderText += "</p>";
          }
          placeholderText += "\n\n";
          i++;
        }
        switch (opts.type) {
          case "words":
            numOfWords = opts.amount;
            numOfWords = parseInt(numOfWords);
            list = new Array();
            wordList = new Array();
            wordList = placeholderText.split(" ");
            iParagraphCount = 0;
            iWordCount = 0;
            while (list.length < numOfWords) {
              if (iWordCount > wordList.length) {
                iWordCount = 0;
                iParagraphCount++;
                if (iParagraphCount + 1 > placeholder.length) {
                  iParagraphCount = 0;
                }
                wordList = placeholder[iParagraphCount].split(" ");
                wordList[0] = "\n\n" + wordList[0];
              }
              list.push(wordList[iWordCount]);
              iWordCount++;
            }
            placeholderText = list.join(" ");
            break;
          case "characters":
            outputString = "";
            numOfChars = opts.amount;
            numOfChars = parseInt(numOfChars);
            tempString = placeholder.join("\n\n");
            while (outputString.length < numOfChars) {
              outputString += tempString;
            }
            placeholderText = outputString.substring(0, numOfChars);
            break;
          case "paragraphs":
            break;
        }
        if (!opts.punctuation) {
          placeholderText = placeholderText.replace(",", "").replace(".", "");
        }
        return placeholderText;
      };
      return this.each(function() {
        var $this, placeholderContent;
        $this = $(this);
        placeholderContent = createPlaceholderContent(this);
        return $this.html(placeholderContent);
      });
    };
  })(jQuery);

  $(function() {
    return $('.placeholderText').placeholderText();
  });

}).call(this);
