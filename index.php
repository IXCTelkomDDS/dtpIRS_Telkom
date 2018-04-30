<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "koneksi_db.php";
	include "header.php";
	include "pagination1.php";

	$reload = "index.php?pagination=true";
	$sql = "SELECT * FROM news ORDER BY tgl_news ASC";
	$result = mysqli_query($connect, $sql);

	//pagination config start
	  $rpp = 4; //jml record per halaman
	  $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
	  $tcount = mysqli_num_rows($result);
	  $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; //total page, last page number
	  $count = 0;
	  $i = ($page-1)*$rpp;
	  $no_urut = ($page-1)*$rpp;
	  //pagination config end

?>

	<script src="js/jquery.js"></script>
		<script>
		
		<!-- js field File -->
		
			$(document).ready(function(){
    		$("#research2").css("display","none"); //Menghilangkan file_info2 ketika pertama kali dijalankan
        		$(".detail2").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        			if ($("input[name='jenis_search']:checked").val() != "Prototype") { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#research2").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#research2").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
					if ($("input[name='jenis_search']:checked").val() == "Prototype" ) { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#prototype3").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#prototype3").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
     			});
     		});
			
			<!-- end js field File -->

		</script>



		<title>Kajian IV DTP IRS</title>


	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header navbar navbar-fixed-top" style="background-color: #D3D3D3; height: 100px;">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="images/DDS-telkom.png" width="60" alt="Worthy"></a>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-10">

						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-left" style="padding-left: 33px;">
												<li><a href="#banner" style="font-weight: bold;">Home</a></li>
												<li><a href="#about" style="font-weight: bold;">About IRS</a></li>
												<li><a href="#lab" style="font-weight: bold;">Our Lab</a></li>
												<li><a href="#research" style="font-weight: bold;">Research Result</a></li>
												<li><a href="#contact" style="font-weight: bold;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="index.php"><img id="logo" src="images/logo-telkom.png" width="90" alt="Worthy"></a>
												</div>

											</ul>
										</div>

								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

		<!-- section start -->
		<!-- ================ -->
		<div id="banner" class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white; margin-top: 50px;">
			<div class="container">
				<div class="row">

					<br>
					<br>

					<!-- Search -->
						<div class="col-sm-6">
							<div class="media">
								<div class="media-body text-left">
									<img src="images/home.jpg" width="800" style="height: 450px;" alt="">
								</div>
							</div>
						</div>

					<div class= "nav navbar-nav navbar-right col-md-3">
	                    <form method="post" action="user/search.php">
	                       	<div class="form-group input-group">
	                           	<input style="width: 210px; height: 30px;" type="text" name="keyword" class="form-control" placeholder="Search" value="<?php echo $_REQUEST['keyword'];?>">
	                           	<span class="form-group input-group-btn">
	                               	<button style="height: 30px; padding-right: 30px; font-size: 12px;" class="btn-primary" type="submit">Search</button>
	                           	</span>
	                       	</div>
	                    </form>
	                </div>

						<div class="col-sm-6">
							<div class="media">
								<div class="media-body text-left">
									<h4 class="media-heading" style="margin-top: 30px; margin-left: 50px; margin-bottom: 20px;">---- IRS News ----</h4>

									<?php while(($count<$rpp) && ($i<$tcount)){
									  mysqli_data_seek($result,$i);
									  $data = mysqli_fetch_array($result);

									  //while($data = mysqli_fetch_array($result)) {

									?>

									<p style="margin-left: 40px;"><?php echo ++$no_urut;?>. &nbsp; <?php echo $data['judul_news'];?>
										<br>
										Read more... <?php echo '<a target="_blank" style="font-weight: bold;" href = " '.$data['link'].'">'.$data['link'].'</a>';?>
									</p>

									<?php 
										$i++;
										$count++;
							    		}
									?>

								</div>
							</div>				
						</div>

						<div align="center" style="margin-left: 700px;"><?php echo paginate_one($reload, $page, $tpages);?></div>

                	</div>
                	<!-- End Search -->
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white;">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<h1 id="about" class="title text-center" style="margin-bottom: 35px;">About IRS</h1>
						<div class="col-sm-12">
							<div class="media">
								<div class="media-body text-left">
									<img src="images/IRS.jpg" width="1300" style="height: 450px; margin-bottom: 23px;" alt="">
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="media">
							<div class="media-body text-left">
								<h4 class="media-heading" style="margin-left: 50px; font-size: 26px;">Mission Statement :</h4>
									<p>Ensuring the effectiveness of end-to-end infrastructure research and development activities in accordance with company strategy and planning.</p>
							</div>
						</div>

						<div class="media">
							<div class="media-body text-left">
								<h4 class="media-heading" style="margin-left: 50px; font-size: 26px;">Our Activity :</h4>
									<p><li style="font-weight: bold; font-size: 16px;">Standardization : </li> Development of telecommunication system standards and platforms.</p>
									<p><li style="font-weight: bold; font-size: 16px;">Expertise Help on Digital Infra : </li> Providing expertise in the field of telecommunication structures (BANTEK).</p>
									<p><li style="font-weight: bold; font-size: 16px;">Technology Research on Digital Infra : </li> Do research on infrastructure technology that will be applied in TELKOM.</p>
									<p><li style="font-weight: bold; font-size: 16px;">Shared Service for Amoeba : </li> Supporting the needs of amoeba related to infrastructure technology.</p>
									<p><li style="font-weight: bold; font-size: 16px;">Joint Research : </li> Do joint research on new technology.</p>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="media">
							<div class="media-body text-left">
								<h4 class="media-heading" style="margin-left: 50px; font-size: 26px;">Job Responsibilities :</h4>
									<p><li>Perform technology scanning and initial technology assessment.</li></p>
									<p><li>Undertake the development and preparation of review documents, system standards and implement updating of TELKOM's strategic documents related to technology.</li></p>
									<p><li>Carry out the performance evaluation of technologies including configuration in order to support the activities of the network improvement / deployment and service development and re-engineering.</li></p>
									<p><li>Carry out research and development of models of network infrastructure management through IT capacity management of network and service (OSS and BSS), and security infrastructure.</li></p>
									<p><li>Drafting the design and innovation of digital service & infrastructure integration, especially for products related to infrastructure.</li></p>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						
					</div>

				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section" style="background-color: white;">
			<div class="container">
				<h1 class="text-center title" id="lab">Our Lab</h1>
				<div class="separator"></div>
				<p class="lead text-center" style="font-weight: bold;">This is the lab that is in IRS. There are seven labs on IRS</p>
				<br>			
				<div class="row object-non-visible" data-animation-effect="fadeIn">
					<div class="col-md-12">

						<!-- portfolio items start -->
						<div class="isotope-container row grid-space-20">
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/BAN.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-1">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;">Broadband Access Network Research (BAN)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-1" style="font-weight: bold; color: black;">BAN</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Ensuring the development of BAN technology research to provide recommendations on technology and infrastructure roadmaps, recommendations for strategic plans for infrastructure development and recommendations to support the preparation of infrastructure development business plans.</li></p>
															<p><li>Ensuring BAN planning to support the implementation of infrastructure development.</li></p>
															<p><li>Ensuring alternative proposals for more prospective BAN architectural configurations in order to support infrastructure & network improvement activities.</li></p>
															<p><li>Ensuring the development of BAN laboratory / testbed as miniature network operational for new service research activities and simultaneously for problem troubleshooting facilities in operational.</li></p>
															<p><li>Ensure the assistance of BAN aspect (ISP & OSP) to support relevant units in the development and implementation of infrastructure.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of BROADBAND ACCESS NETWORK LAB functions to support performance achievement.</p>

														<h3 style="font-weight: bold; font-size: 26px;">BAN Lists :</h3>
															<p><li><a href="user/ban-review.php">List of reviews BAN</a></li></p>
															<p><li><a href="user/ban-standardization.php">List of standardization documents BAN</a></li></p>
															<p><li><a href="user/ban-featured.php">List of featured products BAN</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>

							<div class="col-sm-6 col-md-3 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/BCN.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-2">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;"">Broadband Core Network Research (BCN)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-2" style="font-weight: bold; color: black;">BCN</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-2" tabindex="-1" role="dialog" aria-labelledby="project-2-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Perform technology scanning and initial assessment of IP & Metro Network technology.</li></p>
															<p><li>Conduct research and technology development of IP and Metro Network to provide recommendations on roadmap technology and infrastructure, and planning IP & Metro Network to support the implementation of infrastructure development.</li></p>
															<p><li>Perform standard setting system and to implement updates TELKOM strategic documents related to IP technology and the Metro Network.</li></p>
															<p><li>Ensuring BCN planning to support the implementation of infrastructure development.</li></p>
															<p><li>Ensuring more prospective BCN configuration alternative proposal in order to support infrastructure & network improvement activities.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of BROADBAND CORE NETWORK LAB functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">BCN Lists :</h3>
															<p><li><a href="user/bcn-review.php">List of reviews BCN</a></li></p>
															<p><li><a href="user/bcn-standardization.php">List of standardization documents BCN</a></li></p>
															<p><li><a href="user/bcn-featured.php">List of featured products BCN</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/CNP.jpeg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-3">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;">Cloud and Node Platform Research (CNP)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-3" style="font-weight: bold; color: black;">CNP</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-3" tabindex="-1" role="dialog" aria-labelledby="project-3-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Ensuring technology scanning and initial assessment technology in order to develop Telco CNP infrastructure technologies, including elements of infrastructure technologies such as Network Function Virtualization (NFV), Internet & Policy Control (PCRF / PCEF, BRAS / WAG, AAA), Voice Service Control (IMS, SBC, Softswitch, STP).</li></p>
															<p><li>Ensures Telco CNP research to provide recommendations for technology roadmaps, strategic plan recommendations for infrastructure development and recommendations to support the development of infrastructure development business plans.</li></p>
															<p><li>Ensure alternative proposal of Telco CNP architectural configurations that are more prospective in order to support infrastructure & network improvement activities.</li></p>
															<p><li>Ensure the development laboratory / testbed of Telco CNP as miniaturized operational networks to support new service research activities as well as for troubleshooting operational problems.</li></p>
															<p><li>Guarantee the help aspect of Telco CNP aspect to support related units in the framework of infrastructure development and implementation.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of CLOUD & NODE PLATFORM LAB functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">CNP Lists :</h3>
															<p><li><a href="user/cnp-review.php">List of reviews CNP</a></li></p>
															<p><li><a href="user/cnp-standardization.php">List of standardization documents CNP</a></li></p>
															<p><li><a href="user/cnp-featured.php">List of featured products CNP</a></li></p>
													</div>

												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/FMC.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-4">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;"">Mobility and FMC Reseacrh (FMC)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-4" style="font-weight: bold; color: black;">FMC</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-4" tabindex="-1" role="dialog" aria-labelledby="project-4-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Ensure technology scanning and initial assessment technology in order to develop Mobility & FMC infrastructure technology, which includes elements of infrastructure technology such as WiFi, LTE, 4G, 5G, millimeter-wave, IP radio, Satellite, short-range communication, WAG, ANDSF, and other wireless technologies.</li></p>
															<p><li>Ensure Mobility & FMC's research to provide recommendations on technology roadmaps, strategic plan recommendations for infrastructure development and recommendations to support the preparation of infrastructure development business plans.</li></p>
															<p><li>Ensure the preparation of system standards and implement updating of TELKOM's strategic documents related to Mobility & FMC technology.</li></p>
															<p><li>Ensure alternative proposal of Mobility & FMC architectural configuration that is more prospective in order to support infrastructure & network improvement activities.</li></p>
															<p><li>Ensure the development of the laboratory / testbed Mobility & FMC as a miniature operational network to support new service research activities and simultaneously for troubleshooting operational problems.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of MOBILITY & FMC LAB functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">FMC Lists :</h3>
															<p><li><a href="user/fmc-review.php">List of reviews FMC</a></li></p>
															<p><li><a href="user/fmc-standardization.php">List of standardization documents FMC</a></li></p>
															<p><li><a href="user/fmc-featured.php">List of featured products FMC</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/ISR.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-5">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;">Infrastructure Service Research (ISR)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-5" style="font-weight: bold; color: black;">ISR</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-5" tabindex="-1" role="dialog" aria-labelledby="project-5-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Ensure ready for sales products of in-house innovation for SME ecosystem.</li></p>
															<p><li>Ensure DTP (Digital Touch Points) is ready for service in-house innovation results for SME ecosystem.</li></p>
															<p><li>Assist the operation of the SME ecosystem.</li></p>
															<p><li>Monitor product performance within SME ecosystem (especially in-house innovation) and prepare its reporting.</li></p>
															<p><li>Guarding the in-house product innovation development project for the SME ecosystem and presenting its reporting.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of ECOSYSTEM SME INNOVATIONS functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">ISR Lists :</h3>
															<p><li><a href="user/isr-review.php">List of reviews ISR</a></li></p>
															<p><li><a href="user/isr-standardization.php">List of standardization documents ISR</a></li></p>
															<p><li><a href="user/isr-featured.php">List of featured products ISR</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/IXC.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-6">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;">Infrastructure Experience Creation (IXC)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-6" style="font-weight: bold; color: black;">IXC</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-6" tabindex="-1" role="dialog" aria-labelledby="project-6-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Ensure the development of telecommunication technical standards (STEL) and interoperability standards, and carry out updated document testing according to their fields.</li></p>
															<p><li>Ensure the availability and implementation of technical and operational standards development and to implement updating of TELKOM's strategic documents according to their field.</li></p>
															<p><li>Implement technical compliance (network security, fraud & integrity), technical evaluation, and provide recommendations and reports on the results of technical compliance.</li></p>
															<p><li>Ensuring availability and implementation of technical trials for utilization has been integrated with Mini Lab.</li></p>
															<p><li>Ensuring the availability of important data & information on the management of the relevant System Integration & Readiness Lab for the formulation of PIA RKA strategy and proposals.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of SYSTEM INTEGRATION READINESS functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">IXC Lists :</h3>
															<p><li><a href="user/ixc-review.php">List of reviews IXC</a></li></p>
															<p><li><a href="user/ixc-standardization.php">List of standardization documents IXC</a></li></p>
															<p><li><a href="user/ixc-featured.php">List of featured products IXC</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/SOB.jpeg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-7">
											<i class="fa fa-search-plus"></i>
											<span style="font-weight: bold;">Security, OSS and BSS Research (SOB)</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-7" style="font-weight: bold; color: black;">SOB</a>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="project-7" tabindex="-1" role="dialog" aria-labelledby="project-7-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<h3 style="font-weight: bold; font-size: 26px;">Job Responsibilities :</h3>
															<p><li>Perform technology scanning and initial assessment of Security technology, OSS & BSS.</li></p>
															<p><li>Conduct research and development of Security System concept, OSS & BSS telecommunication network to support TELKOM business.</li></p>
															<p><li>Conducting the development of Security system standard, OSS & BSS as well as proposed updating of TELKOM strategic document in Security, OSS & BSS.</li></p>
															<p><li>Perform planning and development of Security System, OSS & BSS to support the implementation of operational management of network infrastructure.</li></p>
															<p><li>Provide expertise assistance in Security, OSS & BSS.</li></p>
													</div>

													<div class="col-md-6">	
														<h4 style="font-size: 26px; margin-top: 30px;">Mission Statement :</h4>
														<p>Leading the management of SECURITY, OSS & BSS LAB functions to support performance achievement.</p>

														<h3 style="font-weight: bold;">SOB Lists :</h3>
															<p><li><a href="user/sob-review.php">List of reviews SOB</a></li></p>
															<p><li><a href="user/sob-standardization.php">List of standardization documents SOB</a></li></p>
															<p><li><a href="user/sob-featured.php">List of featured products SOB</a></li></p>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>							

						</div>
						<!-- portfolio items end -->
					
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section" style="background-color: white;">
			<div class="container">
				<h1 id="research" class="title text-center">Research Result</h1>
				<div class="space"></div>
				<div class="row" style="padding-left: 200px;">
					<div class="col-md-12">
						<div class="media testimonial">
							<div class="media-left" style="width: 70px; height: 70px;">
								<a href="https://bantek.telkomku.com/@dds/login.php" target="_blank"><img src="images/tech-supp2.jpg" alt=""></a>
							</div>
							<div class="media-body">
								<h2 class="media-heading" style="font-weight: bold; margin-left: 15px;"><a href="https://bantek.telkomku.com/@dds/login.php" target="_blank">Technical Support</a></h2>
								<blockquote>
									<p style="margin-left: 15px;">To assist employees in technical matters in the Division on Digital Service Telkom Bandung.</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>

				<br>
				<br>

				<div class="row" style="padding-left: 200px;">
					<div class="col-md-12">
						<div class="media testimonial">
							<div class="media-left" style="width: 70px; height: 70px;">
								<a href="user/research-result.php"><img src="images/list_result.png" alt=""></a>
							</div>
							<div class="media-body">
								<h2 class="media-heading" style="font-weight: bold; margin-left: 15px;"><a href="user/research-result.php">Research Result IRS</a></h2>
								<blockquote>
									<p style="margin-left: 15px;">Research result and standard documents produced by each lab at the IRS.</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>

				<br>
				<br>

				<div class="row" style="padding-left: 200px;">
					<div class="col-md-12">
						<div class="media testimonial">
							<div class="media-left" style="width: 70px; height: 70px;">
								<a href="user/prototype.php"><img src="images/prototype.jpg" alt=""></a>
							</div>
							<div class="media-body">
								<h2 class="media-heading" style="font-weight: bold; margin-left: 15px;"><a href="user/prototype.php">Prototype</a></h2>
								<blockquote>
									<p style="margin-left: 15px;">The results of a review from the lab IRS in the form of a prototype.</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- .section end -->

		
<?php
	include "footer.php";
?>



<!-- pop up details -->
<script type="text/javascript">
    function showDetails2(button) {
        $.ajax({
            success: function(response) {
            }
        });
    }
</script>


<style>

	.media-left {
	position: auto;
	cursor: pointer;
}

	.media-left:hover img {
	transform: scale(1.4);
	transition: all 1s ease-in;
	filter: blur;
}
	
</style>
