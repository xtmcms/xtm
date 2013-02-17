<h2 class="heading">User Profile: {usertitle}</h2>
<div class="basecont">
    <div class="userinfo">
        <div class="lcol">
            <div class="avatar"><img src="{foto}" alt=""/>

                <div class="rateui">{rate}</div>
            </div>
            <ul class="reset">
                <li class="clr">{email}</li>
                [not-group=5]
                <li>{pm}</li>
                [/not-group]
            </ul>
        </div>
        <div class="rcol">
            <ul>
                <li><span class="grey">Full Name:</span> <b>{fullname}</b></li>
                <li><span class="grey">Group:</span> {status} [time_limit]&nbsp;time limit: {time_limit}[/time_limit]
                </li>
                <li><span class="grey">ICQ:</span> <b>{icq}</b></li>
            </ul>
            <ul class="ussep">
                <li><span class="grey">Post Articles:</span> <b>{news-num}</b> [{news}][rss]<img
                        src="{THEME}/images/rss.png" alt="rss" style="vertical-align: middle; margin-left: 5px;"/>[/rss]
                </li>
                <li><span class="grey">Comments:</span> <b>{comm-num}</b> [{comments}]</li>
                <li><span class="grey">Registered Date:</span> <b>{registration}</b></li>
                <li><span class="grey">Last Visited:</span> <b>{lastdate}</b></li>
                <li><span class="grey">Status:</span> [online]<img src="{THEME}/images/online.png"
                                                                   style="vertical-align: middle;"
                                                                   title="Currently Online" alt="Currently Online"/>[/online][offline]<img
                        src="{THEME}/images/offline.png" style="vertical-align: middle;" title="Currently Offline"
                        alt="Currently Offline"/>[/offline]
                </li>
            </ul>
            <ul class="ussep">
                <li><span class="grey">Location:</span> {land}</li>
                <li><span class="grey">Short info:</span> {info}</li>
            </ul>
            <span class="small">[not-logged]{edituser}[/not-logged]</span>
        </div>
        <div class="clr"></div>
    </div>
</div>
<br/>
[not-logged]
<div id="options" style="display:none;">
    <br/><br/>

    <h2 class="heading">Edit Profile</h2>

    <div class="brdform">
        <div class="baseform">
            <table class="tableform">
                <tr>
                    <td class="label">Full Name:</td>
                    <td><input type="text" name="fullname" value="{fullname}" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label">My E-Mail:</td>
                    <td><input type="text" name="email" value="{editmail}" class="f_input"/><br/>

                        <div class="checkbox">{hidemail}</div>
                        <div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1"/> <label
                                for="subscribe">Unsubscribe from subscribed news</label></div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Location:</td>
                    <td><input type="text" name="land" value="{land}" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label">Block List:</td>
                    <td>{ignore-list}</td>
                </tr>
                <tr>
                    <td class="label">ICQ:</td>
                    <td><input type="text" name="icq" value="{icq}" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label">Current Password:</td>
                    <td><input type="password" name="altpass" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label">New Password:</td>
                    <td><input type="password" name="password1" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label">Repeat:</td>
                    <td><input type="password" name="password2" class="f_input"/></td>
                </tr>
                <tr>
                    <td class="label" valign="top">IP Filter:<br/>Your Current IP: {ip}</td>
                    <td>
                        <div><textarea name="allowed_ip" style="width:98%;" rows="5"
                                       class="f_textarea">{allowed-ip}</textarea></div>
                        <div>
						<span class="small pink">
						* Attention! Be careful when changing this setting.
					Access your account will be available only from the IP-addresses or subnets that you specified.
					You can specify multiple IP addresses, one address on each line.
					<br/>
					Example: 192.48.25.71 or 129.42.*.*</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Avatar:</td>
                    <td>
                        <input type="file" name="image" class="f_input"/><br/>

                        <div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes"/>В <label
                                for="del_foto">Delete current avatar</label></div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Short info:</td>
                    <td><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
                </tr>
                <tr>
                    <td class="label">Signature:</td>
                    <td><textarea name="signature" style="width:98%;" rows="5"
                                  class="f_textarea">{editsignature}</textarea></td>
                </tr>
            {xfields}
            </table>
            <div class="fieldsubmit">
                <input class="fbutton" type="submit" name="submit" value="Save"/>
                <input name="submit" type="hidden" id="submit" value="submit"/>
            </div>
        </div>
    </div>
    <br/>
</div>
[/not-logged]