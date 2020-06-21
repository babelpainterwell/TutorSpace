/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/register.js":
/*!****************************************!*\
  !*** ./resources/js/admin/register.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//  ========================= for all register page ===========================
$('input').on('input', function () {
  if ($(this).val()) {
    $(this).next().addClass('fill-color-blue-secondary');
  } else {
    $(this).next().removeClass('fill-color-blue-secondary');
  }
});
$('input').filter('[required]').on('input', function () {
  var allFilled = true;
  $.each($('input').filter('[required]'), function (idx, el) {
    if (!$(el).val()) allFilled = false;
  });

  if (allFilled) {
    $('.btn-next').addClass('btn-next-animation');
    if (isStudent) $('.btn-next').addClass('btn-student');else $('.btn-next').addClass('btn-tutor');
    $('.btn-next').removeClass('bg-grey');
  } else {
    $('.btn-next').removeClass('btn-next-animation');
    if (isStudent) $('.btn-next').removeClass('btn-student');else $('.btn-next').removeClass('btn-tutor');
    $('.btn-next').addClass('bg-grey');
  }
}); //  ========================= register student 2 ===========================

(function () {
  var totalSeconds = 30;
  var currentTimeInterval; // adjusting email input size
  // $(window).resize(function() {
  //     adjustInputEmailSize();
  // });
  // let adjustInputEmailSize = () => {
  //     $.each($('.form-group-4 input'), (idx, el) => {
  //         // alert($(el).height());
  //         $(el).height($(el).width() + 'px');
  //     });
  // };

  startTimeLabel();

  function startTimeLabel() {
    $('#timeLabel').html(pad(totalSeconds));
    currentTimeInterval = setInterval(setTime, 1000);
    $('#resend-code').prop('disabled', true);
  }

  $('#resend-code').click(function () {
    if (!currentTimeInterval) {
      // use ajax to send the email
      $.ajax({
        type: 'GET',
        url: "/admin/register/send-verification-email",
        data: {},
        success: function success(data) {
          var successMsg = data.successMsg;
          toastr.success(successMsg);
          console.log("success");
        },
        error: function error(_error) {
          console.log(_error);
          toastr.error(_error);
        }
      });
      startTimeLabel();
    }
  });

  function setTime() {
    --totalSeconds;
    if (totalSeconds > 0) $('#timeLabel').html(pad(totalSeconds));else {
      totalSeconds = 30;
      $('#timeLabel').html('');
      clearInterval(currentTimeInterval);
      currentTimeInterval = null;
      $('#resend-code').prop('disabled', false);
    }
  }

  function pad(val) {
    var pre = " in ";
    var suffix = ' s';
    var valString = val + "";

    if (valString.length < 2) {
      return pre + "0" + valString + suffix;
    } else {
      return pre + valString + suffix;
    }
  }
})(); // ======================== register student 3 ====================


(function () {
  $('.custom-select').select2({});
})(); // // The tags should be always be the same as in the school_year table! Need to manully update the fields/array!
// $(function () {
//     $("#major").autocomplete({
//         source: majorTags
//     });
//     $("#schoolYear").autocomplete({
//         source: schoolYearTags
//     });
// });
// $("input[type=file]").change(function() {
//     var fileInput = $(this)[0];
//     var filename = fileInput.files[0].name;
//     $('#file-input-text').html(filename);
// });

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/js/admin/register.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/luoshuaiqing/Desktop/TutorSpace/resources/js/admin/register.js */"./resources/js/admin/register.js");


/***/ })

/******/ });