 
 <div id="CamContainer"  onload="setTimeout('init();', 100);">

      <h1>RPi Cam Control</h1>
      <div><img id="mjpeg_dest"></div>
      <button  class="btn btn-primary"  id="video_button" type="button">Video</button>
      <button  class="btn btn-primary"  id="image_button" type="button">Image</button>
      <button  class="btn btn-primary"  id="timelapse_button" type="button">Timelapse</button>
      <button  class="btn btn-primary"  id="md_button" type="button">md</button>
      <button  class="btn btn-primary"  id="halt_button" type="button">halt</button>
      <p></p><p><a href="../preview.php">Download Videos and Images</a></p>
      <h2>Settings</h2>
      <table class="table table-striped">
        <tr>
          <td width="40%">Resolutions:</td>
          <td>
            Load Preset: <select class="form-control" onclick="set_preset(this.value)">
              <option value="1920 1080 25 25 2592 1944">Select option...</option>
              <option value="1920 1080 25 25 2592 1944">Std FOV</option>
              <option value="1296 0730 25 25 2592 1944">16:9 wide FOV</option>
              <option value="1296 0976 25 25 2592 1944">4:3 full FOV</option>
              <option value="1920 1080 01 30 2592 1944">Std FOV, x30 Timelapse</option>
            </select><br>
            Custom Values:<br>
            Video res:
            <div class="input-group">
                <input class="form-control" type="text" size=4 id="video_width">
                <span class="input-group-addon"> x </span>
                <input class="form-control" type="text" size=4 id="video_height">
                <span class="input-group-addon">px</span>
            </div>
            <br>
            Video fps:
            <div class="input-group">
            	<input class="form-control" type="text" size=2 id="video_fps">
            	<span class="input-group-addon"> recording, </span>
            	<input class="form-control" type="text" size=2 id="MP4Box_fps">
            	<span class="input-group-addon">boxing</span>
            </div>
            <br>
            Image res:
            <div class="input-group">
            	<input class="form-control"  type="text" size=4 id="image_width">
                <span class="input-group-addon"> x </span>
                <input class="form-control" type="text" size=4 id="image_height">
                <span class="input-group-addon">px</span>
            </div>
            <br>
            <button type="button" class="btn btn-primary btn-block" value="OK" onclick="set_res();">OK</button>
          </td>
        </tr>
        <tr>
          <td>Timelapse-Interval (0.1...3200):</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="tl_interval" value="3"><span class="input-group-addon">s</span></div></td>
        </tr>
        <tr>
          <td>Sharpness (-100...100), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="sharpness"><span class="input-group-btn"><button  class="btn btn-primary"  value="OK" onclick="send_cmd('sh ' + document.getElementById('sharpness').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Contrast (-100...100), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="contrast"><span class="input-group-btn"><button  class="btn btn-primary"  value="OK" onclick="send_cmd('co ' + document.getElementById('contrast').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Brightness (0...100), default 50:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="brightness"><span class="input-group-btn"><button  class="btn btn-primary"  value="OK" onclick="send_cmd('br ' + document.getElementById('brightness').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Saturation (-100...100), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="saturation"><span class="input-group-btn"><button  class="btn btn-primary"  value="OK" onclick="send_cmd('sa ' + document.getElementById('saturation').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>ISO (100...800), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="iso"><span class="input-group-btn"><button  class="btn btn-primary"   value="OK" onclick="send_cmd('is ' + document.getElementById('iso').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Metering Mode, default 'average':</td>
          <td>
            <select class="form-control" onclick="send_cmd('mm ' + this.value)">
              <option value="average">Select option...</option>
              <option value="average">Average</option>
              <option value="spot">Spot</option>
              <option value="backlit">Backlit</option>
              <option value="matrix">Matrix</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Video Stabilisation, default: 'off'</td>
          <td><div class="input-group"><input  class="form-control"  value="ON" onclick="send_cmd('vs 1')"><span class="input-group-btn"><button  class="btn btn-primary" value="OFF" onclick="send_cmd('vs 0')">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Exposure Compensation (-10...10), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="comp"><span class="input-group-btn"><button  class="btn btn-primary" value="OK" onclick="send_cmd('ec ' + document.getElementById('comp').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Exposure Mode, default 'auto':</td>
          <td>
            <select class="form-control" onclick="send_cmd('em ' + this.value)">
              <option value="auto">Select option...</option>
              <option value="off">Off</option>
              <option value="auto">Auto</option>
              <option value="night">Night</option>
              <option value="nightpreview">Nightpreview</option>
              <option value="backlight">Backlight</option>
              <option value="spotlight">Spotlight</option>
              <option value="sports">Sports</option>
              <option value="snow">Snow</option>
              <option value="beach">Beach</option>
              <option value="verylong">Verylong</option>
              <option value="fixedfps">Fixedfps</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>White Balance, default 'auto':</td>
          <td>
            <select class="form-control" onclick="send_cmd('wb ' + this.value)">
              <option value="auto">Select option...</option>
              <option value="off">Off</option>
              <option value="auto">Auto</option>
              <option value="sun">Sun</option>
              <option value="cloudy">Cloudy</option>
              <option value="shade">Shade</option>
              <option value="tungsten">Tungsten</option>
              <option value="fluorescent">Fluorescent</option>
              <option value="incandescent">Incandescent</option>
              <option value="flash">Flash</option>
              <option value="horizon">Horizon</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Image Effect, default 'none':</td>
          <td>
            <select class="form-control" onclick="send_cmd('ie ' + this.value)">
              <option value="none">Select option...</option>
              <option value="none">None</option>
              <option value="negative">Negative</option>
              <option value="solarise">Solarise</option>
              <option value="sketch">Sketch</option>
              <option value="denoise">Denoise</option>
              <option value="emboss">Emboss</option>
              <option value="oilpaint">Oilpaint</option>
              <option value="hatch">Hatch</option>
              <option value="gpen">Gpen</option>
              <option value="pastel">Pastel</option>
              <option value="watercolour">Watercolour</option>
              <option value="film">Film</option>
              <option value="blur">Blur</option>
              <option value="saturation">Saturation</option>
              <option value="colourswap">Colourswap</option>
              <option value="washedout">Washedout</option>
              <option value="posterise">Posterise</option>
              <option value="colourpoint">Colourpoint</option>
              <option value="colourbalance">Colourbalance</option>
              <option value="cartoon">Cartoon</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Colour Effect, default 'disabled':</td>
          <td>
          <div class="input-group">
            <select class="form-control" id="ce_en">
              <option value="0">Disabled</option>
              <option value="1">Enabled</option>
            </select>
          
            <span class="input-group-addon">u:v=</span>
            <input class="form-control" type="text" size=3 id="ce_u">
            <span class="input-group-addon"> : </span>
            <input class="form-control" type="text" size=3 id="ce_v">
            <span class="input-group-btn">
            	<button  class="btn btn-primary"  value="OK" onclick="set_ce();">OK</button>
            </span>
          </div>
          </td>
        </tr>
        <tr>
          <td>Rotation, default 0:</td>
          <td>
            <select class="form-control" onclick="send_cmd('ro ' + this.value)">
              <option value="0">Select option...</option>
              <option value="0">0</option>
              <option value="90">90</option>
              <option value="180">180</option>
              <option value="270">270</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Flip, default 'none':</td>
          <td>
            <select class="form-control"  onclick="send_cmd('fl ' + this.value)">
              <option value="0">Select option...</option>
              <option value="0">None</option>
              <option value="1">Horizonal</option>
              <option value="2">Vertical</option>
              <option value="3">Both</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Sensor Region, default 0/0/65536/65536:</td>
          <td>
          <div class="input-group">
            <span class="input-group-addon">x:</span>
            <input class="form-control"  type="text" size=5 id="roi_x">
            <span class="input-group-addon">y:</span>
            <input class="form-control"  type="text" size=5 id="roi_y">
            <span class="input-group-addon">w:</span>
            <input  class="form-control" type="text" size=5 id="roi_w">
            <span class="input-group-addon">h:</span>
            <input  class="form-control" type="text" size=5 id="roi_h">
            <span class="input-group-btn">
            	<button  class="btn btn-primary"   value="OK" onclick="set_roi();">OK</button>
            </span>
          </div>  
          </td>
        </tr>
        <tr>
          <td>Shutter speed (0...330000), default 0:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="shutter_speed"><span class="input-group-btn"><button  class="btn btn-primary"   value="OK" onclick="send_cmd('ss ' + document.getElementById('shutter_speed').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Image quality (0...100), default 85:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=4 id="quality"><span class="input-group-btn"><button  class="btn btn-primary"   value="OK" onclick="send_cmd('qu ' + document.getElementById('quality').value)">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Raw Layer, default: 'off'</td>
          <td><div class="input-group"><input class="form-control" value="ON" onclick="send_cmd('rl 1')"><span class="input-group-btn"><button class="btn btn-primary" value="OFF" onclick="send_cmd('rl 0')">OK</button></span></div></td>
        </tr>
        <tr>
          <td>Video bitrate (0...25000000), default 17000000:</td>
          <td><div class="input-group"><input class="form-control"  type="text" size=10 id="bitrate"><span class="input-group-btn"><button  class="btn btn-primary"  value="OK" onclick="send_cmd('bi ' + document.getElementById('bitrate').value)">OK</button></span></div></td>
        </tr>
      </table>
