import * as React from "react";
import { useGetBlogInfoQuery } from "../../../api/getInfoWordpressApi";
//https://developer.wordpress.org/reference/functions/get_bloginfo/
function Welcome() {
  const infoWP = {
    router: 'fp_infoblog',
    info:{'Site_title':'name','Site_tagline':'description'}
  }
  const { data } = useGetBlogInfoQuery(infoWP);

  return (
    <>
      <div id="Dashboard" className="tabcontent">
        <p className="pheadline">Hello {data?.Current_user}</p>
        <p>Welcome to FivePrayer.</p>
      </div>
    </>
  );
}

export default Welcome;
