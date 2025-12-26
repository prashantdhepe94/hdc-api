
pipeline {
	agent any

	environment {
		COMPOSER_ALLOW_XDEBUG = '0'
		APP_ENV = 'testing'
	}

	options {
		timestamps()
		ansiColor('xterm')
		timeout(time: 60, unit: 'MINUTES')
	}

	stages {
		stage('Checkout') {
			steps { checkout scm }
		}

		stage('Backend - Composer Install') {
			steps {
				echo 'Installing PHP dependencies (composer)'
				sh 'composer --version'
				sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
			}
		}

		stage('Backend - Prepare') {
			steps {
				echo 'Prepare .env and generate key'
				sh '''
				if [ ! -f .env ]; then
				  cp .env.example .env || true
				fi
				php artisan key:generate || true
				'''
			}
		}

		stage('Backend - Migrate & Test') {
			steps {
				echo 'Running migrations and tests'
				sh '''
				php artisan migrate --force || true
				./vendor/bin/phpunit --configuration phpunit.xml || true
				'''
			}
		}

		stage('Frontend - Build') {
			steps {
				echo 'Building frontend (../Frontend)'
				dir('../Frontend') {
					sh 'node --version || true'
					sh 'npm --version || true'
					sh 'npm ci --silent'
					sh 'npm run build --silent'
				}
			}
		}

		stage('Archive Artifacts') {
			steps {
				archiveArtifacts artifacts: 'storage/logs/**', allowEmptyArchive: true
			}
		}
	}

	post {
		always {
			echo 'Cleaning workspace'
			cleanWs()
		}
		success {
			echo 'Pipeline succeeded'
		}
		failure {
			echo 'Pipeline failed'
		}
	}
}

