Demo for Devkit -> CircleCI integration -> WP Engine
By Robert Li (WP Engine, Solutions Engineer, Assoc., APAC)

This demo uses:
bcaphotogdev Development Site for BCA photography site

```
Create SSH Key pair for github:
1.	$ ssh-keygen -t rsa -C "[GITHUB_EMAIL]"
	# Label the SSH key pair: github_rsa
	# Generates SSH RSA key pair, public and private for github (github_rsa, github_rsa.pub)
2.	$ cd ~/.ssh
	$ cat github_rsa.pub
	# Copy the public key
3. Log in to your github account, click your profile pic and click "Settings"
4. Click "SSH and GPG Keys"
5. Click "New SSH Key"
6. Paste the public key and label it "WPE DevKit > CircleCI" (or whatever you want that makes sense)
7. Click "Add SSH Key" > Confirm via password 
```

This next section assumes you have already installed WPE DevKit

	$ brew install wpengine/wpe-cli/wpe-cli
	
Set it up 

	$ wpe setup

And pulled a project / created a new one

	$ wpe clone [INSTALL_NAME]
	$ wpe project new [PROJECT_NAME]

```
Initialise git repo:
1. Create a blank repository in github > name it your [INSTALL_NAME] or [PROJECT_NAME] - do not create README, license or gitignore files.
	1.a. Navigate to your project folder (cd ~/wpe_projects/[INSTALL_NAME])
2. Terminal > 
	$ wpe alpha generate circleci
	# Generates yml file for Circle CI to build environment with (cd ./.circleci/config.yml)	
3. 	$ git init
	# This creates the .git repo in your local project work folder (cd ./.git)
4.	$ git add .
	# Adds the files in the local repository and stages them for commit.
	## To unstage a file, use 'git reset HEAD YOUR-FILE'.
5.	$ git commit -m "First Commit"
	# Commits the tracked changes and prepares them to be pushed to a remote repository. Message is mandatory. 
	## To remove this commit and modify the file, use 'git reset --soft HEAD~1' and commit and add the file again.
6. Go to your repo in github, click [Clone or Download] and copy the [repo URL]. 
	Format: https://github.com/[USERNAME]/[REPO_NAME].git
7.	$ git remote add origin [repo URL]
	# Sets the git remote (i.e. sets where the github repo is located)
	$ git remote -v
	# Verifies the [repo URL] is correct.
8.	$ git push -u origin master
	# Pushes the changes in your local repository up to the remote repository you specified as the origin
```

This next step assumes you have already created a CircleCI account (free accounts get 1000 Minutes of compiling time a month) and created a project named [INSTALL_NAME]. (Sign up for CircleCI, click on your profile picture and go to "User Settings" > Go to "Account Integrations" > Connect your github account > Accept permissions. Click "Check Permissions" to make sure it works.

```
Initialise CircleCI
1. In CircleCI go to "ADD PROJECTS"
2. Your repos should show up in CircleCI > Press "Set Up Project" for the correct repo
3. Click your project name [INSTALL_NAME]
4. Click the gear icon on the top right
5. Click "Checkout SSH Keys" > Ensure that CircleCI has created an SSH key pair between CircleCI and github > click the description of the SSH key there.
6. Go to "SSH Permissions"
7. Terminal >
	$ cd ~/.ssh
	$ ssh-keygen -m PEM -t rsa -C "[YOUR_WPE_EMAIL]"
	# Name the SSH Key Pair: circleci_rsa (circleci_rsa, circleci_rsa.pub)
	$ cat circleci_rsa
	# Copy the SSH Private Key starting with "-----BEGIN RSA PRIVATE KEY-----"
8. Go back to "SSH Permissions" in CircleCI and click "Add SSH Key" > Paste the private key in the field 
	Leave Hostname BLANK.
9 Terminal >
	$ cat circleci_rsa.pub
	# Copy the SSH Public Key
10. Go to your SSH keys in WP Engine: https://my.wpengine.com/ssh_keys
11. Click "New SSH key" > Paste in the SSH Public Key > Click "Add SSH Key"
12. Go BACK to CircleCI Project Settings > Go to Environment Variables
13. Add 2 variables by clicking "Add Variable"
	13.a. Name: EMAIL_ADDRESS | Value: [YOUR_WPE_EMAIL]
	13.b. Name: INSTALL_NAME | Value: [INSTALL_NAME] (this is the destination install on WP Engine)
```

Test git push to WP Engine via CircleCI workflow.

```
1. Navigate to the project folder that you created the git repo for earlier ($ cd ~/wpe_projects/[INSTALL_NAME])
2. Terminal >
	$ touch test.txt
	# This creates a test text file.
3.	$ git add .
	# Adds the file to the local repo
4.	$ git commit -m "Testing CircleCI Workflow"
	# Commits the test file with the message "Testing CircleCI Workflow"
5.	$ git push -u origin master
	# Pushes the test to github for CircleCI to further push it to WP Engine
```

Verify this has worked by checking CircleCI > "Jobs"
Then verify this has worked on WP Engine by SSH'ing into [INSTALL_NAME]

	$ ssh [INSTALL_NAME]@[INSTALL_NAME].ssh.wpengine.net

or via Redshell
	
	$ gogo [INSTALL_NAME]

Verify that git pull works by making a change in git repo and navigating to the project folder (cd ~/wpe_projects/[INSTALL_NAME])

	$ git pull
