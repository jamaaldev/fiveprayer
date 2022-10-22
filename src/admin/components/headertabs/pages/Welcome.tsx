import * as React from "react";
import { useGetBlogInfoQuery } from "../../../api/getInfoWordpressApi";
//https://developer.wordpress.org/reference/functions/get_bloginfo/
// https://developer.wordpress.org/reference/functions/wp_add_inline_script/

declare const FivePrayerData:{
  Current_user:string
};

function Welcome() {

  return (
    <>
      <div id="Dashboard" className="tabcontent">
        <p className="pheadline">Hello {FivePrayerData?.Current_user}</p>
        <p>Welcome to FivePrayer.</p>
      </div>
    </>
  );
}

export default Welcome;
