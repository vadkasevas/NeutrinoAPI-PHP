<?php
/*
 * NeutrinoAPI
 *
 * This file was automatically generated for NeutrinoAPI by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace NeutrinoAPILib\Controllers;

use NeutrinoAPILib\APIException;
use NeutrinoAPILib\APIHelper;
use NeutrinoAPILib\Configuration;
use NeutrinoAPILib\Models;
use NeutrinoAPILib\Exceptions;
use NeutrinoAPILib\Http\HttpRequest;
use NeutrinoAPILib\Http\HttpResponse;
use NeutrinoAPILib\Http\HttpMethod;
use NeutrinoAPILib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class Imaging extends BaseController
{
    /**
     * @var Imaging The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return Imaging The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Resize an image and output as either JPEG or PNG. See: https://www.neutrinoapi.com/api/image-
     * resize/
     *
     * @param string  $imageUrl  The URL to the source image
     * @param integer $width     Width to resize to (in px)
     * @param integer $height    Height to resize to (in px)
     * @param string  $format    (optional) The output image format, can be either png or jpg
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function imageResize(
        $imageUrl,
        $width,
        $height,
        $format = 'png'
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/image-resize';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'user-id' => Configuration::$userId,
            'api-key' => Configuration::$apiKey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0'
        );

        //prepare parameters
        $_parameters = array (
            'image-url' => $imageUrl,
            'width'     => $width,
            'height'    => $height,
            'format'    => (null != $format) ? $format : 'png'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Form($_parameters));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Generate a QR code as a PNG image. See: https://www.neutrinoapi.com/api/qr-code/
     *
     * @param string  $content  The content to encode into the QR code (e.g. a URL or a phone number)
     * @param integer $width    (optional) The width of the QR code (in px)
     * @param integer $height   (optional) The height of the QR code (in px)
     * @param string  $fgColor  (optional) The QR code foreground color (you should always use a dark color for this)
     * @param string  $bgColor  (optional) The QR code background color (you should always use a light color for this)
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function qRCode(
        $content,
        $width = 250,
        $height = 250,
        $fgColor = '#000000',
        $bgColor = '#ffffff'
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/qr-code';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'width'    => (null != $width) ? $width : 250,
            'user-id' => Configuration::$userId,
            'api-key' => Configuration::$apiKey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0'
        );

        //prepare parameters
        $_parameters = array (
            'content'  => $content,
            'height'   => (null != $height) ? $height : 250,
            'fg-color' => (null != $fgColor) ? $fgColor : '#000000',
            'bg-color' => (null != $bgColor) ? $bgColor : '#ffffff'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Form($_parameters));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Watermark one image with another image. See: https://www.neutrinoapi.com/api/image-watermark/
     *
     * @param string  $imageUrl      The URL to the source image
     * @param string  $watermarkUrl  The URL to the watermark image
     * @param integer $opacity       (optional) The opacity of the watermark (0 to 100)
     * @param string  $format        (optional) The output image format, can be either png or jpg
     * @param string  $position      (optional) The position of the watermark image, possible values are: center, top-
     *                               left, top-center, top-right, bottom-left, bottom-center, bottom-right
     * @param integer $width         (optional) If set resize the resulting image to this width (preserving aspect
     *                               ratio)
     * @param integer $height        (optional) If set resize the resulting image to this height (preserving aspect
     *                               ratio)
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function imageWatermark(
        $imageUrl,
        $watermarkUrl,
        $opacity = 50,
        $format = 'png',
        $position = 'center',
        $width = null,
        $height = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/image-watermark';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'user-id' => Configuration::$userId,
            'api-key' => Configuration::$apiKey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0'
        );

        //prepare parameters
        $_parameters = array (
            'image-url'     => $imageUrl,
            'watermark-url' => $watermarkUrl,
            'opacity'       => (null != $opacity) ? $opacity : 50,
            'format'        => (null != $format) ? $format : 'png',
            'position'      => (null != $position) ? $position : 'center',
            'width'         => $width,
            'height'        => $height
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Form($_parameters));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Render HTML and HTML5 content to PDF, JPG or PNG
     *
     * @param string  $content       The HTML content. This can be either a URL to load HTML from or an actual HTML
     *                               content string
     * @param string  $format        (optional) Which format to output, available options are: PDF, PNG, JPG
     * @param string  $pageSize      (optional) Set the document page size, can be one of: A0 - A9, B0 - B10, Comm10E,
     *                               DLE or Letter
     * @param string  $title         (optional) The document title
     * @param integer $margin        (optional) The document margin (in mm)
     * @param integer $marginLeft    (optional) The document left margin (in mm)
     * @param integer $marginRight   (optional) The document right margin (in mm)
     * @param integer $marginTop     (optional) The document top margin (in mm)
     * @param integer $marginBottom  (optional) The document bottom margin (in mm)
     * @param bool    $landscape     (optional) Set the document to lanscape orientation
     * @param double  $zoom          (optional) Set the zoom factor when rendering the page (2.0 for double size, 0.5
     *                               for half size)
     * @param bool    $grayscale     (optional) Render the final document in grayscale
     * @param bool    $mediaPrint    (optional) Use @media print CSS styles to render the document
     * @param bool    $mediaQueries  (optional) Activate all @media queries before rendering. This can be useful if you
     *                               wan't to render the mobile version of a responsive website
     * @param bool    $forms         (optional) Generate real (fillable) PDF forms from HTML forms
     * @param string  $css           (optional) Inject custom CSS into the HTML. e.g. 'body { background-color: red;}'
     * @param integer $imageWidth    (optional) If rendering to an image format (PNG or JPG) use this image width (in
     *                               pixels)
     * @param integer $imageHeight   (optional) If rendering to an image format (PNG or JPG) use this image height (in
     *                               pixels). The default is automatic which dynamically sets the image height based on
     *                               the content
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function hTML5Render(
        $content,
        $format = 'PDF',
        $pageSize = 'A4',
        $title = null,
        $margin = 0,
        $marginLeft = 0,
        $marginRight = 0,
        $marginTop = 0,
        $marginBottom = 0,
        $landscape = false,
        $zoom = 1.0,
        $grayscale = false,
        $mediaPrint = false,
        $mediaQueries = false,
        $forms = false,
        $css = null,
        $imageWidth = 1024,
        $imageHeight = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/html5-render';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'user-id' => Configuration::$userId,
            'api-key' => Configuration::$apiKey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0'
        );

        //prepare parameters
        $_parameters = array (
            'output-case'   => 'camel',
            'content'       => $content,
            'format'        => (null != $format) ? $format : 'PDF',
            'page-size'     => (null != $pageSize) ? $pageSize : 'A4',
            'title'         => $title,
            'margin'        => (null != $margin) ? $margin : 0,
            'margin-left'   => (null != $marginLeft) ? $marginLeft : 0,
            'margin-right'  => (null != $marginRight) ? $marginRight : 0,
            'margin-top'    => (null != $marginTop) ? $marginTop : 0,
            'margin-bottom' => (null != $marginBottom) ? $marginBottom : 0,
            'landscape'     => (null != $landscape) ? var_export($landscape, true) : false,
            'zoom'          => (null != $zoom) ? $zoom : 1.0,
            'grayscale'     => (null != $grayscale) ? var_export($grayscale, true) : false,
            'media-print'   => (null != $mediaPrint) ? var_export($mediaPrint, true) : false,
            'media-queries' => (null != $mediaQueries) ? var_export($mediaQueries, true) : false,
            'forms'         => (null != $forms) ? var_export($forms, true) : false,
            'css'           => $css,
            'image-width'   => (null != $imageWidth) ? $imageWidth : 1024,
            'image-height'  => $imageHeight
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Form($_parameters));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }
}
